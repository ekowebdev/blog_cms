<?php 

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Bidang :attribute harus disetujui.',
    'accepted_if' => 'Bidang :attribute harus disetujui saat :other adalah :value.',
    'active_url' => 'Bidang :attribute harus berupa URL yang valid.',
    'after' => 'Bidang :attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => 'Bidang :attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Bidang :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Bidang :attribute hanya boleh berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => 'Bidang :attribute hanya boleh berisi huruf dan angka.',
    'any_of' => 'Bidang :attribute tidak valid.',
    'array' => 'Bidang :attribute harus berupa array.',
    'ascii' => 'Bidang :attribute hanya boleh berisi karakter ASCII.',
    'before' => 'Bidang :attribute harus berupa tanggal sebelum :date.',
    'before_or_equal' => 'Bidang :attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Bidang :attribute harus memiliki antara :min dan :max item.',
        'file' => 'Bidang :attribute harus antara :min dan :max kilobyte.',
        'numeric' => 'Bidang :attribute harus antara :min dan :max.',
        'string' => 'Bidang :attribute harus antara :min dan :max karakter.',
    ],
    'boolean' => 'Bidang :attribute harus bernilai true atau false.',
    'can' => 'Bidang :attribute memiliki nilai yang tidak sah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'contains' => 'Bidang :attribute tidak mengandung nilai yang diperlukan.',
    'current_password' => 'Kata sandi salah.',
    'date' => 'Bidang :attribute harus berupa tanggal yang valid.',
    'date_equals' => 'Bidang :attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'Bidang :attribute tidak cocok dengan format :format.',
    'decimal' => 'Bidang :attribute harus memiliki :decimal angka desimal.',
    'declined' => 'Bidang :attribute harus ditolak.',
    'declined_if' => 'Bidang :attribute harus ditolak saat :other adalah :value.',
    'different' => 'Bidang :attribute dan :other harus berbeda.',
    'digits' => 'Bidang :attribute harus terdiri dari :digits digit.',
    'digits_between' => 'Bidang :attribute harus antara :min dan :max digit.',
    'dimensions' => 'Dimensi gambar di Bidang :attribute tidak valid.',
    'distinct' => 'Bidang :attribute memiliki nilai yang duplikat.',
    'doesnt_end_with' => 'Bidang :attribute tidak boleh diakhiri dengan salah satu dari berikut: :values.',
    'doesnt_start_with' => 'Bidang :attribute tidak boleh diawali dengan salah satu dari berikut: :values.',
    'email' => 'Bidang :attribute harus berupa alamat email yang valid.',
    'ends_with' => 'Bidang :attribute harus diakhiri dengan salah satu dari berikut: :values.',
    'enum' => 'Pilihan :attribute tidak valid.',
    'exists' => 'Pilihan :attribute tidak valid.',
    'extensions' => 'Bidang :attribute harus memiliki salah satu ekstensi berikut: :values.',
    'file' => 'Bidang :attribute harus berupa berkas.',
    'filled' => 'Bidang :attribute harus memiliki nilai.',
    'gt' => [
        'array' => 'Bidang :attribute harus memiliki lebih dari :value item.',
        'file' => 'Bidang :attribute harus lebih dari :value kilobyte.',
        'numeric' => 'Bidang :attribute harus lebih besar dari :value.',
        'string' => 'Bidang :attribute harus lebih dari :value karakter.',
    ],
    'gte' => [
        'array' => 'Bidang :attribute harus memiliki :value item atau lebih.',
        'file' => 'Bidang :attribute harus lebih dari atau sama dengan :value kilobyte.',
        'numeric' => 'Bidang :attribute harus lebih besar dari atau sama dengan :value.',
        'string' => 'Bidang :attribute harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'hex_color' => 'Bidang :attribute harus berupa warna hex yang valid.',
    'image' => 'Bidang :attribute harus berupa gambar.',
    'in' => 'Pilihan :attribute tidak valid.',
    'in_array' => 'Bidang :attribute harus ada dalam :other.',
    'in_array_keys' => 'Bidang :attribute harus mengandung setidaknya salah satu kunci berikut: :values.',
    'integer' => 'Bidang :attribute harus berupa bilangan bulat.',
    'ip' => 'Bidang :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Bidang :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Bidang :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Bidang :attribute harus berupa string JSON yang valid.',
    'list' => 'Bidang :attribute harus berupa daftar.',
    'lowercase' => 'Bidang :attribute harus berupa huruf kecil.',
    'lt' => [
        'array' => 'Bidang :attribute harus memiliki kurang dari :value item.',
        'file' => 'Bidang :attribute harus kurang dari :value kilobyte.',
        'numeric' => 'Bidang :attribute harus kurang dari :value.',
        'string' => 'Bidang :attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => 'Bidang :attribute tidak boleh lebih dari :value item.',
        'file' => 'Bidang :attribute harus kurang dari atau sama dengan :value kilobyte.',
        'numeric' => 'Bidang :attribute harus kurang dari atau sama dengan :value.',
        'string' => 'Bidang :attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'Bidang :attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => 'Bidang :attribute tidak boleh memiliki lebih dari :max item.',
        'file' => 'Bidang :attribute tidak boleh lebih dari :max kilobyte.',
        'numeric' => 'Bidang :attribute tidak boleh lebih dari :max.',
        'string' => 'Bidang :attribute tidak boleh lebih dari :max karakter.',
    ],
    'max_digits' => 'Bidang :attribute tidak boleh memiliki lebih dari :max digit.',
    'mimes' => 'Bidang :attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => 'Bidang :attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'array' => 'Bidang :attribute harus memiliki minimal :min item.',
        'file' => 'Bidang :attribute harus minimal :min kilobyte.',
        'numeric' => 'Bidang :attribute harus minimal :min.',
        'string' => 'Bidang :attribute harus minimal :min karakter.',
    ],
    'min_digits' => 'Bidang :attribute harus memiliki minimal :min digit.',
    'missing' => 'Bidang :attribute harus kosong.',
    'missing_if' => 'Bidang :attribute harus kosong saat :other adalah :value.',
    'missing_unless' => 'Bidang :attribute harus kosong kecuali :other adalah :value.',
    'missing_with' => 'Bidang :attribute harus kosong saat :values tersedia.',
    'missing_with_all' => 'Bidang :attribute harus kosong saat :values tersedia.',
    'multiple_of' => 'Bidang :attribute harus kelipatan dari :value.',
    'not_in' => 'Pilihan :attribute tidak valid.',
    'not_regex' => 'Format Bidang :attribute tidak valid.',
    'numeric' => 'Bidang :attribute harus berupa angka.',
    'password' => [
        'letters' => 'Bidang :attribute harus mengandung setidaknya satu huruf.',
        'mixed' => 'Bidang :attribute harus mengandung huruf besar dan kecil.',
        'numbers' => 'Bidang :attribute harus mengandung setidaknya satu angka.',
        'symbols' => 'Bidang :attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => ':attribute yang diberikan sudah bocor. Silakan gunakan :attribute yang berbeda.',
    ],
    'present' => 'Bidang :attribute harus tersedia.',
    'present_if' => 'Bidang :attribute harus tersedia saat :other adalah :value.',
    'present_unless' => 'Bidang :attribute harus tersedia kecuali :other adalah :value.',
    'present_with' => 'Bidang :attribute harus tersedia saat :values tersedia.',
    'present_with_all' => 'Bidang :attribute harus tersedia saat semua :values tersedia.',
    'prohibited' => 'Bidang :attribute dilarang.',
    'prohibited_if' => 'Bidang :attribute dilarang saat :other adalah :value.',
    'prohibited_if_accepted' => 'Bidang :attribute dilarang saat :other diterima.',
    'prohibited_if_declined' => 'Bidang :attribute dilarang saat :other ditolak.',
    'prohibited_unless' => 'Bidang :attribute dilarang kecuali :other adalah salah satu dari :values.',
    'prohibits' => 'Bidang :attribute melarang :other untuk tersedia.',
    'regex' => 'Format Bidang :attribute tidak valid.',
    'required' => 'Bidang :attribute wajib diisi.',
    'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :values.',
    'required_if' => 'Bidang :attribute wajib diisi saat :other adalah :value.',
    'required_if_accepted' => 'Bidang :attribute wajib diisi saat :other diterima.',
    'required_if_declined' => 'Bidang :attribute wajib diisi saat :other ditolak.',
    'required_unless' => 'Bidang :attribute wajib diisi kecuali :other ada dalam :values.',
    'required_with' => 'Bidang :attribute wajib diisi saat :values tersedia.',
    'required_with_all' => 'Bidang :attribute wajib diisi saat semua :values tersedia.',
    'required_without' => 'Bidang :attribute wajib diisi saat :values tidak tersedia.',
    'required_without_all' => 'Bidang :attribute wajib diisi saat tidak ada :values yang tersedia.',
    'same' => 'Bidang :attribute harus sama dengan :other.',
    'size' => [
        'array' => 'Bidang :attribute harus memiliki :size item.',
        'file' => 'Bidang :attribute harus berukuran :size kilobyte.',
        'numeric' => 'Bidang :attribute harus bernilai :size.',
        'string' => 'Bidang :attribute harus terdiri dari :size karakter.',
    ],
    'starts_with' => 'Bidang :attribute harus diawali dengan salah satu dari: :values.',
    'string' => 'Bidang :attribute harus berupa string.',
    'timezone' => 'Bidang :attribute harus berupa zona waktu yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'uploaded' => 'Gagal mengunggah :attribute.',
    'uppercase' => 'Bidang :attribute harus huruf kapital.',
    'url' => 'Bidang :attribute harus berupa URL yang valid.',
    'ulid' => 'Bidang :attribute harus berupa ULID yang valid.',
    'uuid' => 'Bidang :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title' => 'judul',
        'name' => 'nama',
        'short_description' => 'deskripsi singkat',
        'content' => 'konten',
        'image' => 'gambar',
        'status' => 'status',
        'email' => 'email',
        'password' => 'kata sandi',
        'current_password' => 'kata sandi saat ini',
        'new_password' => 'kata sandi baru',
        'password_confirmation' => 'konfirmasi kata sandi',
        'body' => 'konten',
        'status' => 'status',
        'attributes' => [
            'data_not_exist' => 'Data :attribute tidak ditemukan'
        ],
    ],

];
