<?php
namespace App\Models;
use App\Core\Db;
//différentes méthodes utilisables par défaut pour les manipulations de la base
class Model extends Db
{
  // Table de la base de données
  protected $table;
  // Instance de connexion
  private $db;

  //CRUD
  //commence par le read (chercher les infos)

  //1. méthode pour aller chercher tous les infos d'une table
  public function findAll()
  {
    $query = $this->requete('SELECT * FROM ' . $this->table);
    return $query->fetchAll();
  }

  //2. méthode pour aller chercher une sélection d'enregistrements en fonction de critères
  public function findBy(array $criteres)
  {
    $champs = [];
    $valeurs = [];

    // On boucle pour "éclater le tableau"
    foreach ($criteres as $champ => $valeur) {
      $champs[] = "$champ = ?";
      $valeurs[] = $valeur;
    }
    // On transforme le tableau en chaîne de caractères séparée par des AND
    $liste_champs = implode(' AND ', $champs);
    // On exécute la requête
    return $this->requete('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
  }

  //3. méthode qui permettra de récupérer 1 enregistrement en fonction de son id
  public function find(int $id)
  {
    // On exécute la requête
    return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
  }

  //CREATE pour inserer des données 
  /**
   * Insertion d'un enregistrement suivant un tableau de données
   * @param Model $model Objet à créer
   * @return bool
   */
  public function create()
  {
    $champs = [];
    $inter = [];
    $valeurs = [];

    // On boucle pour éclater le tableau
    foreach ($this as $champ => $valeur) {
      // INSERT INTO annonces (titre, description, actif) VALUES (?, ?, ?)
      if ($valeur !== null && $champ != 'db' && $champ != 'table') {
        $champs[] = $champ;
        $inter[] = "?";
        $valeurs[] = $valeur;
      }
    }

    // On transforme le tableau "champs" en une chaine de caractères
    $liste_champs = implode(', ', $champs);
    $liste_inter = implode(', ', $inter);

    // On exécute la requête
    return $this->requete('INSERT INTO ' . $this->table . ' (' . $liste_champs . ')VALUES(' . $liste_inter . ')', $valeurs);
  }

  //UPDATE pour la mise à jour de données
  /**
   * Mise à jour d'un enregistrement suivant un tableau de données
   * @param int $id id de l'enregistrement à modifier
   * @param Model $model Objet à modifier
   * @return bool
   */
  public function update()
  {
    $champs = [];
    $valeurs = [];

    // On boucle pour éclater le tableau
    foreach ($this as $champ => $valeur) {
      // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
      if ($valeur !== null && $champ != 'db' && $champ != 'table') {
        $champs[] = "$champ = ?";
        $valeurs[] = $valeur;
      }
    }
    $valeurs[] = $this->id;

    // On transforme le tableau "champs" en une chaine de caractères
    $liste_champs = implode(', ', $champs);

    // On exécute la requête
    return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
  }

  //DELETE pour la suppression des données
  /**
   * Suppression d'un enregistrement
   * @param int $id id de l'enregistrement à supprimer
   * @return bool 
   */
  public function delete(int $id)
  {
    return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
  }
 

  

  //métode hydratation de notre objet, c'est à dire la définition de ses propriétés à partir d'un tableau ou d'un formulaire, par exemple.
  /**
   * Hydratation des données
   * @param array $donnees Tableau associatif des données
   * @return self Retourne l'objet hydraté
   */
  public function hydrate($donnees)
  {
      foreach ($donnees as $key => $value) {
          // On récupère le nom du setter correspondant à la clé (key)
          // titre -> setTitre
          $setter = 'set' . ucfirst($key);

          // On vérifie si le setter existe
          if (method_exists($this, $setter)) {
              // On appelle le setter
              $this->$setter($value);
          }
      }
      return $this;
  }



  /**
   * Méthode qui exécutera les requêtes
   * @param string $sql Requête SQL à exécuter
   * @param array $attributes Attributs à ajouter à la requête 
   * @return PDOStatement|false 
   */
  public function requete(string $sql, array $attributs = null)
  {
    // On récupère l'instance de Db
    $this->db = Db::getInstance();

    // On vérifie si on a des attributs
    if ($attributs !== null) {
      // Requête préparée
      $query = $this->db->prepare($sql);
      $query->execute($attributs);
      return $query;
    } else {
      // Requête simple
      return $this->db->query($sql);
    }
  }
}
