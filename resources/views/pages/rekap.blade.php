@extends('layouts.admin')

@section('title')
    Rekap Data
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row p-4">
            <div class="col-12">
                {{-- start:validasi input alert --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- end:validasi input alert --}}
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('rekap', $tahun) }}" method="get">
                            @csrf
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Masukan Tahun</label>
                                <input type="number" class="form-control" name="tahun" placeholder="Isi data berupa tahun">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="w-100 btn btn-warning">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="row mt-2 p-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Sales overview</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">Grafik</span> tahun 
                        {{ $tahun }}
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="400"></canvas>
                    </div>
                    <a href="{{ route('rekap-excel') }}" class="btn btn-small btn-success w-100">Rekapitulasi Excel</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('add-script')
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");
  var tanggal = new Date();
  // tanggal.setDate(tanggal.getDate() - 10);

  // var sepuluh_terakhir = tanggal.getDate() + "/" + tanggal.getMount();

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  var gradientStroke2 = ctx1.createLinearGradient(230, 0, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(74, 237, 123, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(74, 237, 123, 0)');
  gradientStroke1.addColorStop(0, 'rgba(74, 237, 123, 0.1)');

  gradientStroke2.addColorStop(1, 'rgba(242, 79, 46, 0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(242, 79, 46, 0)');
  gradientStroke2.addColorStop(0, 'rgba(242, 79, 46, 0.1)');
  new Chart(ctx1, {
      type: "line",
      data: {
      labels: [
        "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sept", "Okt", "Nov", "Des"
      ],
      datasets: [{
          label: "Pemasukan",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#42f56c",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [{{ $pemasukan_jan }}, {{ $pemasukan_feb }}, {{ $pemasukan_mar }}, {{ $pemasukan_apr }}, {{ $pemasukan_mei }}, {{ $pemasukan_jun }}, {{ $pemasukan_jul }}, {{ $pemasukan_agt }}, {{ $pemasukan_sep }},{{ $pemasukan_okt }}, {{ $pemasukan_nov }}, {{ $pemasukan_des }}],
          maxBarThickness: 12

      },
      {
          label: "Pengeluaran",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#f24f2e",
          backgroundColor: gradientStroke2,
          borderWidth: 3,
          fill: true,
          data: [{{ $pengeluaran_jan }}, {{ $pengeluaran_feb }}, {{ $pengeluaran_mar }}, {{ $pengeluaran_apr }}, {{ $pengeluaran_mei }}, {{ $pengeluaran_jun }}, {{ $pengeluaran_jul }}, {{ $pengeluaran_agt }}, {{ $pengeluaran_sep }},{{ $pengeluaran_okt }}, {{ $pengeluaran_nov }}, {{ $pengeluaran_des }}],
          maxBarThickness: 12

      }
      ],
      },
      options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
          legend: {
          display: false,
          }
      },
      interaction: {
          intersect: false,
          mode: 'index',
      },
      scales: {
          y: {
          grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
          },
          ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
              },
          }
          },
          x: {
          grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
          },
          ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
              },
          }
          },
      },
      },
  });

</script>
@endpush