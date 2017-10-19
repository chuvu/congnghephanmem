<?php

include APPPATH .'third_party/ciplus/interface/InterfaceAuth.php';

class UserModel extends MY_Model implements InterfaceAuth
{
    protected $errors = array();

    /**
     * Các trường được phép thêm vào bảng users
     * @var array
     */
    protected $fillable = array(
        'firstname', 'lastname', 'birth', 'email', 'phone', 'avatar', 'password', 'remember_token'
    );
    
    /**
     * Các trường được phép lấy ra từ cơ sở dữ liệu
     * @var array
     */
    protected $show = array(
        'id', 'firstname', 'lastname', 'birth', 'email', 'phone', 'avatar', 'created_at', 'updated_at',
    );

    public function get($userId)
    {
        return $this->db
            ->select(implode(',', $this->show))
            ->where('id', $userId)
            ->get('users')
            ->first_row();
    }

    public function getByEmail($email)
    {
        return $this->db
            ->where('email', $email)
            ->get('users')
            ->first_row();
    }

    public function getByRemeberToken($token)
    {
        return $this->db
            ->where('remember_token', $token)
            ->get('users')
            ->first_row();
    }

    public function getMany(array $data)
    {
        return $this->db
            ->select(implode(',', $this->show))
            ->get('users')
            ->result();
    }

    public function create(array $data)
    {
        if (isset($data['birth'])) {
            $data['birth'] = date_format(date_create($data['birth']), 'Y-m-d');
        }
        
        $this->db->set('created_at', 'NOW()', false);
        $this->db->set('updated_at', 'NOW()', false);
        $this->db->insert('users', array_only($data, $this->fillable));

        return $this->get($this->db->insert_id());
    }

    public function update(array $data, $userId)
    {
        if (isset($data['birth'])) {
            $data['birth'] = date_format(date_create($data['birth']), 'Y-m-d');
        }

        $this->db->set('updated_at', 'NOW()', false);
        $this->db->where('id', $userId)->update('users', array_only($data, $this->fillable));

        return $this->get($userId);
    }

    public function delete($userId)
    {
        //
    }

    public function attempt($username, $password)
    {
        $user = $this->db
            ->select('id,password')
            ->where('email', $username)
            ->get('users')
            ->first_row();

        if (!$user || (decrypt($user->password) != $password)) {
            return false;
        }

        return $user->id;
    }

    public function id()
    {
        return 'id';
    }
}
