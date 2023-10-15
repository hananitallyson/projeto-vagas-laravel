<x-app-layout>
    <main class="flex flex-col">
        <div class="flex justify-between my-1 border-b-2 border-blue-600">
            <h2 class="text-4xl font-bold m-2">Editar Vaga</h2>
            <a href="{{ route('vagas.index') }}">
                <button type="submit" class="mt-5 focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Voltar</button>
            </a>
        </div>

        <form action="{{ route('vagas.update', $vaga) }}" method="post">
            @method('patch')
            @csrf
            <div class="flex flex-col my-2">
                <label class="font-bold" for="titulo">Título</label>
                <input type="text" class="px-2 py-1 border-2 border-gray-300 rounded-lg" name="titulo" value="{{ $vaga->titulo }}">
            </div>

            <div class="flex flex-col my-2">
                <label class="font-bold" for="descricao">Descrição</label>
                <textarea class="px-2 py-1 border-2 border-gray-300 rounded-lg" name="descricao">{{ $vaga->descricao }}</textarea>
            </div>

            <div class="my-2">
                <label class="font-bold">Status</label>
                <div class="flex space-x-4 mt-1">
                    <div class="flex items-center">
                        <input id="default-radio-1" type="radio" value="1" name="ativo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" checked>
                        <label for="ativo" class="ml-2 font-medium text-gray-900">Ativo</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="0" name="ativo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" {{ $vaga->ativo == 0 ? 'checked' : '' }}>
                        <label for="ativo" class="ml-2 font-medium text-gray-900">Inativo</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="mt-5 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Editar</button>
            </div>
        </form>
    </main>
</x-app-layout>
