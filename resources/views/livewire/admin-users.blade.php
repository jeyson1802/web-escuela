<div class="card">
    <div class="card-header">
        <input  wire:keydown="clearPage" wire:model="search" type="search" class="form-control w-100" placeholder="Digite o parametro de busca">
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
               @forelse ($users as $user)
                   <tr>
                       <td width="10px">{{ $user->id }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                       <td width="10px"><a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Editar</a></td>
                   </tr>
               @empty
                   <tr><td colspan="3">Nenhuma user registrado :)</td></tr>
               @endforelse
            </tbody>
        </table>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</div>
