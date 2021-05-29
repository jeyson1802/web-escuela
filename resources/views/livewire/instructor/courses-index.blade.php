<div class="container py-8">
 <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table-responsive>
            <div class="flex px-6 py-4">
                <input wire:keydown="clearPage" wire:model="search" type="search" class="flex-1 shadow-sm form-input" placeholder="Digitar o nome de um curso..">
                 <a class="ml-2 btn btn-red" href="{{ route('instructor.courses.create') }}">{{ _('Create new course') }}</a>
              </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                      {{ __('Name the course') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        {{ __('Enrollements') }}
                    </th> 
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        {{ __('Rating') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        {{ __('Status') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  
                    @forelse ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                              @isset($course->image)
                                <img class="w-10 h-10 rounded-full" src="{{ Storage::url($course->image->url) }}" alt="{{$course->name}}">
                              @else
                                <img class="w-10 h-10 rounded-full" src="{{ asset('images/noPhotoFound.png') }}" alt="no Photo Found">
                              @endisset
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{$course->title}}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{$course->category->name}}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                          <div class="text-sm text-gray-500">{{ __('Students') }}</div>
                        </td>
                       <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center text-sm text-gray-900">
                              {{ $course->rating }}
                            <ul class="flex ml-2 text-sm">
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow':'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow':'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow':'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow':'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow':'gray'}}-400"></i></li>
                            </ul>
                        </div>
                          <div class="text-sm text-gray-500">{{ __('Classification the course') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                           @switch($course->status)
                               @case(\App\Models\Course::DRAFT)
                               <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                {{ __(Str::camel(\App\Models\Course::DRAFT)) }}
                              </span>
                                   @break
                               @case(\App\Models\Course::REVISION)
                               <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                {{ __(Str::camel(\App\Models\Course::REVISION)) }}
                              </span>
                                   @break
                               @default
                               <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                {{ __(Str::camel(\App\Models\Course::PUBLISHED)) }}
                              </span>
                           @endswitch
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <a href="{{ route("instructor.courses.edit", $course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
                  {{ $courses->links() }}
              </div>
        </x-table-responsive>
  </div>
