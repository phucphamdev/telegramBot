<!--begin::Action--->
<td class="text-end">
    <button data-destroy="{{ route('historybank.edit', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Edit
    </button>

    <button data-destroy="{{ route('historybank.destroy', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Delete
    </button>
</td>
<!--end::Action--->
