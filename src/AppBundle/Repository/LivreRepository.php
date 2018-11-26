<?php


namespace AppBundle\Repository;


class LivreRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchGenre($genre){

        //var_dump('hello genre'); die;
        $queryBuilder = $this->createQueryBuilder('l');

        $query = $queryBuilder
                ->select('l')
                ->where('l.genre =:genre')
                ->setParameter('genre', $genre)
                ->getQuery();

        $results = $query->getArrayResult();
        return $results;
    }


    public function getAuteurByPays($genre){

        //var_dump('hello genre'); die;
        $queryBuilder = $this->createQueryBuilder('a');

        $query = $queryBuilder
            ->select('a')
            ->where('a.pays =:pays')
            ->setParameter('genre', $genre)
            ->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }


}
