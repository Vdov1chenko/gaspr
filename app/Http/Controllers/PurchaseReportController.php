<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use League\Csv\Writer;

class PurchaseReportController extends Controller
{
    public function generate($format)
    {
        // Выбираем данные о покупках за последний месяц
        $reportData = Purchase::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->where('created_at', '>=', now()->subMonth())
                        ->groupBy('date')
                        ->get();

        if ($format == 'json') {
            // Если формат JSON, возвращаем данные в формате JSON
            return response()->json($reportData);
        } elseif ($format == 'csv') {
            // Если формат CSV, генерируем CSV файл
            $csv = $this->generateCsv($reportData);
            return response()->streamDownload(function () use ($csv) {
                echo $csv;
            }, 'purchase_report.csv');
        } else {
            // Если указан неподдерживаемый формат, возвращаем ошибку
            return response()->json(['error' => 'Unsupported format'], 400);
        }
    }

    private function generateCsv($data)
    {
        // Создаем экземпляр Writer
        $csv = Writer::createFromString('');

        // Добавляем заголовки
        $csv->insertOne(['Date', 'Count']);

        // Добавляем данные
        foreach ($data as $row) {
            $csv->insertOne([$row->date, $row->count]);
        }

        // Получаем содержимое CSV файла
        $csvData = $csv->getContent();

        return $csvData;
    }
}
