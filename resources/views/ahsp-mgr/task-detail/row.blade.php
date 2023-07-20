<tr>
  <td class="text-right">{{ $i }}</td>
  <td>{{ $item->item->name }}</td>
  <td class="text-right">{{ format_decimal($item->coefficient, 4) }}</td>
  <td>{{ $item->item->uom }}</td>
  <td>
    <form class="inline" method="POST" action="{{ url("/ahsp-mgr/tasks/{$task->id}/details/$item->id") }}">
      @csrf
      @method('DELETE')
      <div class="btn-group">
        <a href="{{ url("/ahsp-mgr/tasks/{$task->id}/details/$item->id") }}" class="btn btn-xs btn-default"
          title="Ubah Item"><i class="fa fa-edit"></i></a>
        <button class="btn btn-xs btn-danger" name="do" value="delete" title="Hapus Item" type="submit"
          onclick="return confirm_delete()"><i class="fa fa-trash"></i></button>
      </div>
    </form>
  </td>
</tr>
