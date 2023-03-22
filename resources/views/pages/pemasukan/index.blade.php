@extends('layouts.admin')

@section('title')
    Pemasukan
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row px-4">
        <div class="col-12">
            <a href="{{ route('pemasukan.create') }}" class="btn btn-warning w-30">Tambah Data Pemasukan</a>
            <a href="{{ route('pemasukan.export') }}" class="btn btn-success w-30">Download Excel</a>
            <a href="{{ route('pemasukan.drop') }}" class="btn btn-danger w-30" onclick="return confirm('Yakin hapus semuanya?')">Remove All</a>
        </div>
    </div>
    <div class="row p-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Dibuat</th>
                                    <th>Diperbarui</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('add-script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('pemasukan.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'keterangan', name: 'keterangan'},
              {data: 'jumlah', name: 'jumlah'},
              {data: 'created_at', name: 'created_at'},
              {data: 'updated_at', name: 'updated_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>
@endpush

@push('add-style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush