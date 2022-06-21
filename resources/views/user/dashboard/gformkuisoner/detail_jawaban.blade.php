
@extends('user.layouts.udashboard')

@section('title', 'Isi Kuisoner')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/style.css">
@endsection

@section('content')

<div class="form">
    <center>
        <h3>
            <strong> FORM KUISONER <br> HIDUP BERSIH KELUARGA </strong>
        </h3>
    </center>
</div>
<hr>
<br>
    
    @php $index=1 @endphp
    @foreach($kuisoners as $kuisoner)
    <div class="container">
        <div class="row">
            <div class="col">
                <table>
                    <tr>
                        <td>{{ $index++ }}. {{ $kuisoner->pertanyaan }}</td>
                    </tr>
                    <tr>
                        <td>
                            
                            @php
                            $jawabanuser = ''
                            @endphp
                            @foreach ($jawaban_users as $jawaban_user)
                                @php 
                                if($jawaban_user->kuisoner_id == $kuisoner->id){
                                    $jawabanuser = $jawaban_user->isi_kuisoner->id;
                                } 
                                @endphp
                            @endforeach
                            @foreach($kuisoner->jawaban as $jawaban)
                            <p><input type='radio' name='{{$kuisoner->id}}' value='{{$jawaban->id}}' @checked($jawabanuser == $jawaban->id) disabled required />
                                {{$jawaban->jawaban}}
                            </p>
                            @endforeach
                        </td>
                    </tr>
                </table>
                @if($kuisoner->penjelasan != null)
                <!-- modal button -->
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Detail
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{$kuisoner->penjelasan}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach

@endsection

@section('script')
<script>
    $(document).on("click", ".deleteButton", function() {
        let id = $(this).val();

        $("#deleteForm").attr("action", "{{ route('admin.dashboard.jawaban.index') }}/" + id)
        $("#deleteModal").modal();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>
@endsection