<div id="{{ $object->id . '-modal' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Pengaduan {{ $object->pengaduans->first()->users->name }} Pada {{ $object->pengaduans->first()->tempats->nama }}</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <center>  
              @if (isset($object->pengaduans) && $object->pengaduans->first()->foto)
                <img class="img-rounded img-responsive " style="width: 30rem; height: 30rem" src="{!!asset('img/'.$object->pengaduans->first()->foto)!!}">
              @else
                 Foto belum di upload
              @endif
            <div class="row">
                Kategori : {{ $object->pengaduans->first()->kategoris->nama }}
            </div>
            <div class="row">
              Status :  @if (!isset($object->penanganans->pengajuans))
                          Belum ditangani
                        @else
                          <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal-petugas' }}" class="btn btn-primary btn-xs">Sedang ditangani</a>
                        @endif
            </div>
            <div class="row">
                {{ $object->nama }}
            </div>
          </center>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>