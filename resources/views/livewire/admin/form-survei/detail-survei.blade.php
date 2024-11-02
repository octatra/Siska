<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-3xl">Detail Survei: {{ $data->priode_survei ?? 'N/A' }}</h3>
                </div>
                <div class="card-body">
                    @if ($data)
                        <h5 class="text-3xl">Status: {{ $data->status_survei }}</h5> <!-- Memperbesar status -->

                        <h4 class="text-3xl">Pertanyaan:</h4> <!-- Memperbesar judul Pertanyaan -->
                        <ul class="list-group">
                            @if ($data->pertanyaanSurvei && $data->pertanyaanSurvei->isNotEmpty())
                                @foreach ($data->pertanyaanSurvei as $indeks => $pertanyaan)
                                    <li class="list-group-item">
                                        <h4 class="text-3xl">No. {{ $indeks + 1 }}</h4>
                                        <h4 class="text-3xl">{{ $pertanyaan->pertanyaan }}</h4>
                                        <!-- Memperbesar pertanyaan -->
                                        @if ($pertanyaan->jenis_pertanyaan === 'pilihan_ganda')
                                            <ul>
                                                @foreach ([$pertanyaan->opsi1, $pertanyaan->opsi2, $pertanyaan->opsi3, $pertanyaan->opsi4] as $opsi)
                                                    @if ($opsi)
                                                        <div class="form-check flex items-center mb-2">
                                                            <!-- Menggunakan flex untuk baris -->
                                                            <input class="form-check-input" type="radio"
                                                                name="opsi_{{ $pertanyaan->id }}"
                                                                id="opsi_{{ $pertanyaan->id }}_{{ $indeks }}">
                                                            <h5 class="form-check-label text-xl ml-2"
                                                                for="opsi_{{ $pertanyaan->id }}_{{ $indeks }}">
                                                                {{ $opsi }}
                                                            </h5>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item">Tidak ada pertanyaan yang tersedia.</li>
                            @endif
                        </ul>
                    @else
                        <p class="text-xl">Survei tidak ditemukan.</p> <!-- Memperbesar teks not found -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
