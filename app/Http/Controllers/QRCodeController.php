<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRCodeHistory as QRCodeHistory;

class QRCodeController extends Controller
{
    /**
     * Generate a QR code for a given class.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'class_id' => 'required|string',
            'class_name' => 'required|string',
        ]);

        $classData = [
            'class_id' => $request->class_id,
            'class_name' => $request->class_name,
        ];

        $qrCode = QrCode::size(300)->generate(json_encode($classData));

        // Save to QR code history
        \Log::info('Generating QR Code with data:', [
            'class_id' => $request->class_id,
            'class_name' => $request->class_name,
        ]);

        \Log::info('Inserting QR Code History:', [
            'class_id' => $request->class_id,
            'class_name' => $request->class_name,
            'qr_code' => $qrCode,
        ]);

        QRCodeHistory::create([
            'class_id' => $request->class_id,
            'class_name' => $request->class_name,
            'qr_code' => $qrCode,
        ]);

        return view('qrcode', compact('qrCode'));
    }

    /**
     * Delete a QR code from history.
     */
    public function delete($id)
    {
        $qrCode = QRCodeHistory::findOrFail($id);
        $qrCode->delete();

        return redirect()->route('qrcode.history')->with('success', 'QR Code deleted successfully.');
    }

    public function history()
    {
        $qrCodes = QRCodeHistory::all(); // Fetch all QR code history records
        return view('qrcode_history', compact('qrCodes')); // Pass the data to the view
    }
}
