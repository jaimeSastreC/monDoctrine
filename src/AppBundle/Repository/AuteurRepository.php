<?php


namespace AppBundle\Repository;

/**
 * Class AuteurRepository
 * @package AppBundle\Repository
 */
class AuteurRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAuteurByCountry($country){

        //var_dump('hello genre'); die;
        $queryBuilder = $this->createQueryBuilder('a');

        $query = $queryBuilder
            ->select('a')
            ->where('a.pays =:pays')
            ->setParameter('pays', $country)
            ->getQuery();
        $results = $query->getResult();
        return $results;
    }

//recherche par contenu dans biographie !!!!!!!!!!!!!!
    public function getNameBiography($name){
        //crée objet constructeur de requete sur table l
        $queryBuilder = $this->createQueryBuilder('a');
        // utilisation du LIKE avec controle entrée setParameter;
        $query = $queryBuilder
            ->select('a')
            ->where('a.biographie LIKE :biographie')
            ->setParameter('biographie', '%'.$name.'%') // sécurité injection !!!
            ->getQuery(); /// important ! à ajouter
        $results = $query->getResult();
        return $results;

    }

    public function findAll()
    {
        return $this->findBy(array(), array('nom' => 'ASC'));
    }
    //https://symfonycasts.com/screencast/doctrine-queries/and-where-or-where
    /*public function search($term)
    {
        return $this->createQueryBuilder('cat')
            ->andWhere('cat.name LIKE :searchTerm OR cat.iconKey LIKE :searchTerm')
            ->setParameter('searchTerm', '%'.$term.'%')
            ->getQuery()
            ->execute();
    }*/


}