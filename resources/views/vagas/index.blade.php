<x-app-layout>
    <main class="flex justify-center items-center flex-col">
        <section>
            <a href="{{ route('vagas.create') }}">
                <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-lg border-2 border-gray-200 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Cadastrar nova vaga</button>
            </a>
        </section>

        <section>
            <table class="w-full text-sm text-left text-gray-500 my-5">
                <thead class="text-xs text-gray-700 uppercase bg-white border-b-2 border-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Título</th>
                        <th scope="col" class="px-6 py-3">Descrição</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Data</th>
                        <th scope="col" class="px-6 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($vagas->isEmpty())
                        <tr>
                            <td colspan=6 class="border-b-2 text-center border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Não há vagas registradas ainda!</td>
                        </tr>
                    @else
                        @foreach ($vagas as $vaga)
                            <tr>
                                <th class="border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $vaga->id }}</th>
                                <td class="border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $vaga->titulo }}</td>
                                <td class="border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $vaga->descricao }}</td>
                                <td class="border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $vaga->ativo == 0 ? 'Inativo' : 'Ativo' }}</td>
                                <td class="border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $vaga->created_at->format('j M Y, g:i a') == $vaga->updated_at ? $vaga->created_at->format('j M Y, g:i a') : $vaga->updated_at->format('j M Y, g:i a') }} @unless ($vaga->created_at->eq($vaga->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless</td>
                                <td class="flex border-b-2 border-gray-200 bg-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <form action="{{ route('vagas.edit', ['vaga' => $vaga]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Editar</button>
                                    </form>
                                    <form action="{{ route('vagas.destroy', ['vaga' => $vaga]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </section>
    </main>
</x-app-layout>
