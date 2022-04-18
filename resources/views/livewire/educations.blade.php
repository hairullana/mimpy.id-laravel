<div>
  <ul>
    @foreach ($educations as $education)
      <tr>
        <td>{{ $education->id }}</td>
        <td>{{ $education->name }}</td>
        <td>
          <a href="/dashboard/educations/{{ $education->id }}/edit" class="btn btn-outline-primary">Edit</a>
          <form action="/dashboard/educations/{{ $education->id }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger" disabled>Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </ul>
</div>
