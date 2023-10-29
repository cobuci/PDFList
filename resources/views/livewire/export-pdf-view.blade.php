<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>PDF</title>
    @livewireStyles
    @vite(['resources/css/app.css'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
            integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<div class="p-6 w-full bg-gray-800 text-white flex justify-between">
    <div>
        <x-button onclick="window.location.href='{{route('group.show',$group->id ) }}'" red>Voltar</x-button>
    </div>
    <div>
        <h1 class="font-bold text-2xl">Lista # {{ $group->id  }}</h1>
    </div>
    <div>
        <x-button blue onclick="download()">Download</x-button>
    </div>
</div>
<div id="element-to-print" class="px-6 max-w-screen">
    <div class="mt-6 flex flex-wrap min-w-fit justify-center gap-4">
        <div class="w-fit border border-black p-6">
            <h1 class="text-2xl font-bold">Tabela de Preços</h1>
        </div>
        <div class="w-fit border border-black p-6">
            <a class="font-semibold" target="_blank" href="https://www.pureshower.com.br/">WWW.PURESHOWER.COM.BR</a>
        </div>
        <div class="my-auto">
            <img src="{{ asset('images/pure-shower-logo-completo.svg') }}" class="h-10" alt="Logo"/>
        </div>
    </div>
    <div class="mt-6 grid w-full items-center gap-4 rounded-lg md:grid-cols-6">
        <div
            class="flex justify-between px-4 font-bold dark:text-white md:col-span-4 md:col-start-2">
            <div>
                FOTO
            </div>
            <div>
                REFERÊNCIA
            </div>
            <div>
                PREÇO
            </div>
        </div>
        @foreach($group->products as $product)
            <div
                class="border mb-5 border-black md:col-start-2 md:col-span-4 flex min-w-fit min-h-fit cursor-pointer justify-between rounded-lg bg-white shadow-lg
                         dark:bg-gray-900 dark:text-white">
                <div class="flex items-center justify-center rounded-l-lg bg-red-400 max-w-24">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}" class="h-full w-24 rounded-l-lg">
                    @else
                        <p class="flex h-full w-24 items-center justify-center rounded-l-lg text-white">
                            SEM
                            FOTO </p>
                    @endif
                </div>
                <div class="flex-1 border border-x-black px-4">
                    <span class="font-bold">COD.: {{ $product->code }}</span>
                    <ul class="ml-6 list-disc">
                        <li>{{ $product->name }}</li>
                        <li>LOTE MÍNIMO: {{ $product->min_amount }}</li>

                        <br/>
                    </ul>
                    <div class="flex ">
                        <span class="font-bold">VALOR DO SITE R${{ $product->price_site }}</span>
                    </div>
                </div>
                <div class="flex items-center rounded-r-lg border p-2">
                    <span class="font-bold"> R${{ $product->price_sale }}</span>
                </div>

            </div>

        @endforeach


    </div>
</div>
@livewireScripts
</body>

<script>
    const element = document.getElementById('element-to-print');
    const opt = {
        filename: 'myfile.pdf',
        image: {type: 'jpeg', quality: 1},
        html2canvas: {scale: 1},

    };
    const download = () => {
        html2pdf(element, opt);
    }


</script>
