<div class="d-flex">
    <form action="{{ route('pengeluaran.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Kamu yakin untuk menghapusnya?')">Hapus</button>
    </form>
    &nbsp;
    <a href="{{ route('pengeluaran.edit', $id) }}" class="edit btn btn-info btn-sm">Edit</a>
</div>