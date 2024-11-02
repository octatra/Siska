<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-3xl">Detail Survei: {{ $data->priode_survei ?? 'N/A' }}</h3>
                </div>
                <div class="card-body">
                    @if ($data)
                        <h5 class="text-3xl">Status: {{ $data->status_survei }}</h5>

                        <form wire:submit.prevent="submitSurvey"> <!-- Form -->
                            <ul class="list-group">
                                @if ($data->pertanyaanSurvei && $data->pertanyaanSurvei->isNotEmpty())
                                    @foreach ($data->pertanyaanSurvei as $indeks => $pertanyaan)
                                        <li class="list-group-item">
                                            <h4 class="text-3xl">No. {{ $indeks + 1 }}</h4>
                                            <h4 class="text-3xl">{{ $pertanyaan->pertanyaan }}</h4>

                                            @if ($pertanyaan->jenis_pertanyaan === 'pilihan_ganda')
                                                <ul>
                                                    @foreach ([$pertanyaan->opsi1, $pertanyaan->opsi2, $pertanyaan->opsi3, $pertanyaan->opsi4] as $opsi)
                                                        @if ($opsi)
                                                            <div class="form-check flex items-center mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="opsi_{{ $pertanyaan->id }}"
                                                                    id="opsi_{{ $pertanyaan->id }}_{{ $indeks }}"
                                                                    value="{{ $opsi }}"
                                                                    wire:model.defer="responses.{{ $pertanyaan->id }}">
                                                                <h5 class="form-check-label text-xl ml-2"
                                                                    for="opsi_{{ $pertanyaan->id }}_{{ $indeks }}">
                                                                    {{ $opsi }}
                                                                </h5>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @elseif ($pertanyaan->jenis_pertanyaan === 'teks')
                                                <textarea class="form-control" rows="3" wire:model.defer="responses.{{ $pertanyaan->id }}"></textarea>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">Tidak ada pertanyaan yang tersedia.</li>
                                @endif
                            </ul>

                            <!-- Tambahkan tombol kirim di dalam form -->
                            <button class="btn btn-primary mt-4" type="submit">Kirim Survei</button>
                        </form>

                        @if (session()->has('message'))
                            <div class="alert alert-success mt-4">
                                {{ session('message') }}
                            </div>
                        @endif
                    @else
                        <p class="text-xl">Survei tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
