<?php


namespace AppBundle\Repository;


class LivreRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchName($genre){

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


}
