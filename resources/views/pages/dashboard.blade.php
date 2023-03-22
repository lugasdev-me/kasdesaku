@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pemasukan</p>
                  <h5 class="font-weight-bolder">
                    @currency($jumlah_pemasukan)
                  </h5>
                  <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">@currency($pemasukan_terbesar)</span>
                    pemasukan terbesar
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengeluaran</p>
                  <h5 class="font-weight-bolder">
                    @currency($jumlah_pengeluaran)
                  </h5>
                  <p class="mb-0">
                    <span class="text-danger text-sm font-weight-bolder">@currency($pengeluaran_terbesar)</span>
                    pengeluaran terbesar
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Saldo</p>
                  <h5 class="font-weight-bolder">
                    @currency($saldo)
                  </h5>
                  <p class="mb-0">
                    <span class="text-info text-sm font-weight-bolder">@currency($saldo)</span>
                    saldo yang tersisa
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                  <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Sales overview</h6>
            <p class="text-sm mb-0">
              <i class="fa fa-arrow-up text-success"></i>
              <span class="font-weight-bold">Grafik</span> tahun 
              <script>
                document.write(new Date().getFullYear())
              </script>
            </p>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
      </div>
    </div>
      <div class="col-lg-5">
        <div class="card card-carousel overflow-hidden h-100 p-0">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" style="background-image: url('{{ asset('argon-dashboard-master/assets/img/carousel-4.jpg') }}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Pentingnya menabung!</h5>
                  <p>Masa depan tidak bisa diprediksi begitu tepat, menabung adalah salah satu cara menyelamatkan diri dari kehancuran.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('{{ asset('argon-dashboard-master/assets/img/carousel-5.jpg') }}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Batasi Pengeluaranmu!</h5>
                  <p>Prilaku konsumtif merupakan hal buruk yang sulit dilepaskan oleh muda-mudi saat ini, sifat ini perlu dibuang untuk menyelamatkan masa depanmu.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('{{ asset('argon-dashboard-master/assets/img/carousel-6.jpg') }}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-trophy text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Rahasia Orang Sukses?</h5>
                  <p>Bangun pagi dan lakukan hal yang bermanfaat, tidur larut untuk belajar banyak hal.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      {{-- 10 data pemasukan terbaru --}}
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Data Pemasukan 10 terbaru</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody>
                {{-- start:data pemasukan terbaru --}}
                @foreach ($pemasukan as $item)
                <tr>
                  <td class="w-10">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img style="width: 20px;" src="{{ asset('argon-dashboard-master/assets/img/icons/sikasdesa_ico_pemasukan.jpg') }}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">ID:</p>
                        <h6 class="text-sm mb-0">{{ $item->id }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Keterangan:</p>
                      <h6 class="text-sm mb-0">{{ $item->keterangan }}</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Jumlah:</p>
                      <h6 class="text-sm mb-0">@currency($item->jumlah)</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Diperbarui:</p>
                      <h6 class="text-sm mb-0">{{ $item->updated_at->diffForHumans() }}</h6>
                    </div>
                  </td>
                </tr>
                @endforeach
                {{-- end:data pemasukan terbaru --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      {{-- 10 data pengeluaran terbaru --}}
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Data Pengeluaran 10 terbaru</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody>
                {{-- start:data pengeluaran terbaru --}}
                @foreach ($pengeluaran as $item)
                <tr>
                  <td class="w-10">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img style="width: 20px;" src="{{ asset('argon-dashboard-master/assets/img/icons/sikasdesa_ico_pengeluaran.jpg') }}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">ID:</p>
                        <h6 class="text-sm mb-0">{{ $item->id }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Keterangan:</p>
                      <h6 class="text-sm mb-0">{{ $item->keterangan }}</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Jumlah:</p>
                      <h6 class="text-sm mb-0">@currency($item->jumlah)</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Diperbarui:</p>
                      <h6 class="text-sm mb-0">{{ $item->updated_at->diffForHumans() }}</h6>
                    </div>
                  </td>
                </tr>
                @endforeach
                {{-- end:data pengeluaran terbaru --}}
              </tbody>
            </table>
          </div>
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
          label: "Pemasukan tahun " + tanggal.getFullYear(),
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
          label: "Pengeluaran tahun " + tanggal.getFullYear(),
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