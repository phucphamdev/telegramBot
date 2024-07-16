<!--begin::Action--->
<td class="text-end">
    <button data-destroy="{{ route('partnerscustomer.edit', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Edit
    </button>

    <button data-destroy="{{ route('partnerscustomer.destroy', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Delete
    </button>
</td>
<!--end::Action--->
