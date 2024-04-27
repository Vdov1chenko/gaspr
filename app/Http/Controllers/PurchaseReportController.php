<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use League\Csv\Writer;

class PurchaseReportController extends Controller
{
    public function generateReport(Request $request, $format)
    {
    try {
        // Получение данных о покупках за последний месяц
        $purchases = Purchase::purchasesLastMonth();

        // Проверка формата отчета
        if ($format === 'json') {
            // Генерация отчета в JSON
            return response()->json($purchases);
        } elseif ($format === 'csv') {
            // Генерация отчета в CSV
            $headers = ['Product ID', 'Quantity', 'Price', 'Purchase Date'];

            $csv = \League\Csv\Writer::createFromString('');
            $csv->insertOne($headers);

            foreach ($purchases as $purchase) {
                $csv->insertOne([$purchase->product_id, $purchase->quantity, $purchase->price, $purchase->purchase_date]);
            }

            return response($csv->getContent(), 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="purchases_report.csv"',
            ]);
        } else {
            // Неверный формат запроса
            return response()->json(['error' => 'Unsupported format. Supported formats: json, csv'], 400);
        }
    } catch (\Exception $e) {
        // Если возникает исключение, возвращаем ответ с сообщением об ошибке.
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
    }
}