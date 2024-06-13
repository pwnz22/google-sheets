<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets;
use Illuminate\Support\Facades\Storage;

class GoogleSheetController extends Controller
{
    public function index()
    {
        $appeals = Appeal::all();

        return inertia('Appeals', ['appeals' => $appeals]);
    }
    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $appeal = Appeal::create($validatedData);

        // $googleSheetLink = $this->generateLink($appeal);

        // $appeal->update(['link' => $googleSheetLink]);

        return redirect('/')->with('message', 'Ваша заявка успешно отправлена.');
    }

    public function generateLink()
    {
        $client = new Client();
        $client->setApplicationName('Google Sheets API Laravel');
        $client->setScopes([Sheets::SPREADSHEETS, Drive::DRIVE]);
        $client->setAuthConfig(storage_path('app/google/credentials.json'));
        $client->setAccessType('offline');

        $tokenPath = storage_path('app/google/token.json');
        if (Storage::exists('google/token.json')) {
            $accessToken = json_decode(Storage::get('google/token.json'), true);
            $client->setAccessToken($accessToken);
        }

        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                Storage::put('google/token.json', json_encode($client->getAccessToken()));
            } else {
                $authUrl = $client->createAuthUrl();
                return redirect($authUrl);
            }
        }

        $sheetsService = new Sheets($client);

        $spreadsheet = new Sheets\Spreadsheet([
            'properties' => [
                'title' => 'test title'
            ]
        ]);

        $spreadsheet = $sheetsService->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId'
        ]);

        $spreadsheetId = $spreadsheet->spreadsheetId;

        // Add data to the spreadsheet
        $values = [
            ['test title', 'description'],
        ];

        $body = new Sheets\ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $range = 'Sheet1!A1:B1';
        $sheetsService->spreadsheets_values->update($spreadsheetId, $range, $body, $params);

        // Set up Google Drive Service
        $driveService = new Drive($client);

        // Change permissions to make the spreadsheet public
        $permission = new Drive\Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        $driveService->permissions->create($spreadsheetId, $permission);

        $googleSheetsLink = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}";

        return $googleSheetsLink;
    }
}
