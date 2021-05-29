<div>
    <h1 class="mb-4 font-bold text2xl">ESUDANTES DO CURSO</h1>
    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" type="search" class="w-full shadow-sm form-input" placeholder="Digitar o nome de um curso..">
          </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  {{ __('Name') }}
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    {{ __('Email') }}
                </th> 
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              
                @forelse ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                         
                            <img class="w-10 h-10 rounded-full" src="{{ $student->profile_photo_url }}" alt="{{ $student->name }}">
                          </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$student->name}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$student->email }}</div>
                     </td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                      <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                    </td>
                  </tr>
                  @empty
                      <tr>
                          <td colspan="5" align="center">
                              {{ __('No records found')}}
                          </td>
                      </tr>
                @endforelse
  
              <!-- More rows... -->
            </tbody>
          </table>
          <div class="px-6 py-4">
              {{ $students->links() }}
          </div>
    </x-table-responsive>
</div>
