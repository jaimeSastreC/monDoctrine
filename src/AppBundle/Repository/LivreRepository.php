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
//ATTENTION NE PAS UTILISER GETARRAY !!!!!
        $results = $query->getResult();
        return $results;
    }

    /**
     * @param $format
     * @return array
     */
    public function getLivreByFormat($format){

        //var_dump('hello genre'); die;
        $queryBuilder = $this->createQueryBuilder('l');

        $query = $queryBuilder
            ->select('l')
            ->where('l.format =:format')
            ->setParameter('format', $format)
            ->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function findAll()
    {
        return $this->findBy(array(), array('titre' => 'ASC'));
    }

}
