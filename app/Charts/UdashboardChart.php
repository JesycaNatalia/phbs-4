<?php

namespace App\Charts;

use App\Models\Bulan;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class UdashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {


        return $this->chart->lineChart()
            ->setTitle('Grafik Pantauan')
            ->setSubtitle('Total Skor  dan Skor Rata-Rata')
            ->addData('Total Skor', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->addData('Rata-Rata', [70, 70, 70, 70, 45, 34, 24, 23, 32, 23, 32, 23])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Des']);
    }
}
