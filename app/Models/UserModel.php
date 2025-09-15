<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Replace with your table name
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'UserName', 
        'email', 
        'password', 
        'UserTypesId', 
        'NameWithInitial', 
        'name', 
        'LastName', 
        'designation', 
        'StreetAddress', 
        'City', 
        'State', 
        'PostalCode', 
        'contact_number', 
        'Role'
    ];

    public function validateUser($email, $password)
    {
        return $this->where('email', $email)
                    ->where('password', $password) // Assuming MD5 hashing
                    ->first();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updateUserByEmail($email, $data)
    {
        // Ensure $data is not empty before calling update()
        if (!empty($data)) {
            return $this->where('email', $email)->set($data)->update();
        }

        return false; // If no data, return false
    }
}

/*
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Replace with your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password'];

    public function validateUser($email, $password)
    {
        return $this->where('email', $email)
                    ->where('password', $password) // Assuming MD5 hashing
                    ->first();
    }

    public function getUserByEmail($email)
{
    return $this->where('email', $email)->first();
}

public function updateUserByEmail($email, $data)
{
    // Ensure $data is not empty before calling update()
    if (!empty($data)) {
        return $this->where('email', $email)->set($data)->update();
    }

    return false; // If no data, return false
}


}
*/
