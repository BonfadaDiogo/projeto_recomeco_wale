<?php
$a = explode("\\", __DIR__);
$dir = "/{$a[1]}/{$a[2]}/{$a[3]}";


class User {
    //Atributos
    private $cod;
    private $status;
    private $user;
    private$numberCnh; //fazer get revisar os gets e os private 
    private $pass;
    private $photo;
    private $birth;
    private $firstName;
    private $lastName;
    private $desc;
    private $cep;
    private $address;
    private $number;
    private $complement;
    private $neighborhood;
    private $city;
    private $state;
    private $sex;
    private $phone;
    private $email;
    private $notify;
    private $actualPas;
    private $newPass;
    private $perfil;



    //Método construtor
    public function __construct($n, $p) {
        $this->user = $n;
        $this->pass = $p;
    }

    //Método para validar o login
    public function login() {
        //Criando objeto da classe Database
        $db = new Database();

        //Selecionar todos os registros da tabela
        //users
        $listUsers = $db->select(
            "SELECT * FROM users"
        );
        
        //Criando variável booleana para controlar se o
        //login deu certo ou não
        $check = false;

        foreach($listUsers as $u) {
            if($this->user == $u->user_name) {
                //Só entra aqui se encontrar um nome de usuário válido
                if(sha1($this->pass) == $u->user_pass) {
                    //Só entra aqui se a senha do usuario encontrado for
                    //a mesma que a digitada
                    $check = true;

                    //preencher todos os demais atributos 
                    $this->cod = $u->user_cod;
                    $this->photo = $u->user_photo;
                    $this->birth = $u->user_birth;
                    $this->firstName = $u->user_first_name;
                    $this->lastName = $u->user_last_name;
                    $this->desc = $u->user_desc;
                    $this->cep = $u->user_cep;
                    $this->address = $u->user_address;
                    $this->number = $u->user_number;
                    $this->complement = $u->user_complement;
                    $this->neighborhood= $u->user_neighborhood;
                    $this->city = $u->user_city;
                    $this->state = $u->user_state;
                    $this->sex = $u->user_sex;
                    $this->phone = $u->user_phone;
                    $this->email = $u->user_email;
                    $this->notify = $u->user_notify;
                    $this->newPass = $u->user_new_pass;
                    $this->status = $u->user_status;
                    $this->numberCnh = $u->user_numberCnh;
                    $this->perfil = $u->user_profile;


                }
            }
        }
        return $check;
    }

    //Função para retornar o objeto inteiro
    public function getObject () {
        return $this;
    }

    //Função para atualizar objeto com os
    //dados do banco de dados
    public function updateObject($id) {
        //Para obtermos os dados do BD
        //precisamos criar um objeto da
        //classe Database
        $db = new Database();

        //Fazer uso do método de seleção de dados
        $u = $db->select(
            "SELECT * FROM users WHERE user_cod = '$id'"
        );

        //Atualizar atributos do objeto conforme dados
        //do BD
        //$this->cod = $u->user_cod;
        $this->photo            = $u[0]->user_photo;
        $this->birth            = $u[0]->user_birth;
        $this->firstName        = $u[0]->user_first_name;
        $this->lastName         = $u[0]->user_last_name;
        $this->desc             = $u[0]->user_desc;
        $this->cep              = $u[0]->user_cep;
        $this->address          = $u[0]->user_address;
        $this->number           = $u[0]->user_number;
        $this->complement       = $u[0]->user_complement;
        $this->neighborhood     = $u[0]->user_neighborhood;
        $this->city             = $u[0]->user_city;
        $this->state            = $u[0]->user_state;
        $this->sex              = $u[0]->user_sex;
        $this->phone            = $u[0]->user_phone;
        $this->email            = $u[0]->user_email;
        $this->notify           = $u[0]->user_notify;
        $this->newPass          = $u[0]->user_new_pass;
        $this->status           = $u[0]->user_status;
        $this->numberCnh        =$u[0]->user_numberCnh;

        //Agora, retornamos o objeto atualizado
        return $this;
    }


    public function getCod(){
        return $this->cod;
    }

    
    public function getStatus() {
        return $this->status;
    }


    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    public function getNumberCnh()
    {
        return $this->numberCnh;
    }


    /**
     * Set the value of user
     */
    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;

    }
      


    /**
     * Set the value of pass
     */
    public function setPass($pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto($photo): self
    {
        $this->  photo = $photo;

        return $this;
    }

    /**
     * Get the value of birth
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set the value of birth
     */
    public function setBirth($birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     */
    public function setFirstName($firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     */
    public function setLastName($lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of desc
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     */
    public function setDesc($desc): self
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     */
    public function setCep($cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     */
    public function setNumber($number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of complement
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set the value of complemen
     */
    public function setComplement($complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get the value of neighborhood
     */
    public function getneighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Set the value of neighborhood
     */
    public function setNeighborhood($neighborhood): self
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     */
    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     */
    public function setState($state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     */
    public function setSex($sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of notify
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * Set the value of notify
     */
    public function setNotify($notify): self
    {
        $this->notify = $notify;

        return $this;
    }

    /**
     * Get the value of actualPas
     */
    public function getActualPas()
    {
        return $this->actualPas;
    }

    /**
     * Set the value of actualPas
     */
    public function setActualPas($actualPas): self
    {
        $this->actualPas = $actualPas;

        return $this;
    }

    /**
     * Get the value of newPass
     */
    public function getNewPass()
    {
        return $this->newPass;
    }

    /**
     * Set the value of newPass
     */
    public function setNewPass($newPass): self
    {
        $this->newPass = $newPass;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     */
    public function setPerfil($perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }
}


