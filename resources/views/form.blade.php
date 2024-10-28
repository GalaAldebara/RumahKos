<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>


    <div class="card" p-4 mt-4>
        <form action="">
            <div class="form-group">
                <label for="provinsi">provinsi</label>
                <select class="form-control" id="provinsi" aria-label="Default select example">
                    <option>Pilih provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <select class="form-control" id="kabupaten" aria-label="Default select example">
                    <option >Pilih Kabupaten</option>
                   
                  </select>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-control" id="kecamatan" aria-label="Default select example">
                    <option value="1">Pilih Kecamatan</option>
                   
                  </select>
            </div>
            <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control" id="desa" aria-label="Default select example">
                    <option value="1">Pilih Desa</option>
                   
                  </select>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

        $(function(){
            $('#provinsi').on('change', function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {id_provinsi: id_provinsi},
                    cache: false,

                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },

                    error: function(data){
                        console.log('error:',data);
                    },
                })
            }),
            $('#kabupaten').on('change', function(){
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {id_kabupaten: id_kabupaten},
                    cache: false,

                    success: function(msg){
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },

                    error: function(data){
                        console.log('error:',data);
                    },
                })
            }),
            $('#kecamatan').on('change', function(){
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {id_kecamatan: id_kecamatan},
                    cache: false,

                    success: function(msg){
                        $('#desa').html(msg);
                    },

                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })
        })
    });

    </script>
    

  </body>
</html>