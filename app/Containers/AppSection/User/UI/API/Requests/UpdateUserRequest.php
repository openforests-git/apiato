<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use App\Containers\AppSection\Authorization\Traits\IsResourceOwnerTrait;

class UpdateUserRequest extends Request
{
    use IsResourceOwnerTrait;

    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-users',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'password' => 'min:6|max:40',
            'name' => 'min:2|max:50',
            'gender' => 'in:male,female,unspecified',
            'birth' => 'date',
        ];
    }

    public function authorize(): bool
    {
        // is this an admin who has access to permission `update-users`
        // or the user is updating his own object (is the owner).

        return $this->check([
            'hasAccess|isResourceOwner',
        ]);
    }
}
