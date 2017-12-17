<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="Auth")
 * @author  Feras AlSouri <feras.el.souri@gmail.com>
 */
class Auth
{

    /**
     * @Id
     * @Column(type="integer", nullable=false )
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $username;

    /**
     * @Column(type="string", length=64, nullable=false)
     */
    protected $password;

    /**
     * @Column(type="string", length=255, unique=true, nullable=false)
     */
    protected $email;



    /**
     * Encrypt the password before we store it
     *
     * @param	string	$password
     * @return	void
     */
    public function setPassword($password)
    {
        $this->password = $this->hashPassword($password);
    }


    /**
     * Encrypt a Password
     *
     * @param	string	$password
     * @return	string
     */
    public function hashPassword($password)
    {
        if ( ! $this->username)
        {
            throw new \Exception('The username must be set before the password can be hashed.');
        }

        return hash('sha256', $password . $this->username);
    }

    /**
     * Set name
     *
     * @param string $username
     * @return string
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Set name
     *
     * @param string $email
     * @return string
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }




}
