<?php

namespace App\Models;

use PDO;

class UtilisateursModel extends Model
{
  protected $id;
  protected $nom;
  protected $prenom;
  protected $adresse;
  protected $email;
  protected $mdp;
  protected $tel;
  protected $role;
  protected $date_creation;

  public function __construct()
  {
    $this->table = 'utilisateur';
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nom
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of prenom
   */
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @return  self
   */
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  /**
   * Get the value of adresse
   */
  public function getAdresse()
  {
    return $this->adresse;
  }

  /**
   * Set the value of adresse
   *
   * @return  self
   */
  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

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
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of mdp
   */
  public function getMdp()
  {
    return $this->mdp;
  }

  /**
   * Set the value of mdp
   *
   * @return  self
   */
  public function setMdp($mdp)
  {
    $this->mdp = $mdp;

    return $this;
  }

  /**
   * Get the value of tel
   */
  public function getTel()
  {
    return $this->tel;
  }

  /**
   * Set the value of tel
   *
   * @return  self
   */
  public function setTel($tel)
  {
    $this->tel = $tel;

    return $this;
  }

  /**
   * Get the value of role
   */
  public function getRole():array
  {
    $role = $this->role;
    $role[] = 'ROLE_USER';

    return array_unique($role);
  }

  /**
   * Set the value of role
   *
   * @return  self
   */
  public function setRole($role)
  {
    $this->role = $role;

    return $this;
  }

  /**
   * Get the value of date_creation
   */
  public function getDate_creation()
  {
    return $this->date_creation;
  }

  /**
   * Set the value of date_creation
   *
   * @return  self
   */
  public function setDate_creation($date_creation)
  {
    $this->date_creation = $date_creation;

    return $this;
  }

  /**
   * Récupérer un user à partir de son e-mail
   * @param string $email 
   * @return mixed 
   */
  public function findOneByEmail(string $email)
  {
    return $this->requete("SELECT * FROM $this->table WHERE email = ?", [$email])->fetch();
  }

  public function findOneByPassword(string $password)
  {
    return $this->requete("SELECT * FROM $this->table WHERE mdp = ?", [$password])->fetch(PDO::FETCH_ASSOC);
  }
  public function setSession()
  {
    $_SESSION['user'] = [
      'id' => $this->id,
      'nom' => $this->nom,
      'prenom' => $this->prenom,
      'adresse' => $this->adresse,
      'email' => $this->email,
      'tel' => $this->tel,
      'role' => $this->role,
      'date_creation' => $this->date_creation
    ];
  }
// public function deleteUtilisateurAdmin($id){

//     return $this->requete("DELETE FROM utilisateur , vehicule WHERE utilisateur.id = ? AND vehicule.id_utilisateur = id", [$id]);


//   }

}

