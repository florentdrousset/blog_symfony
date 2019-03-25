<?php

namespace App\Repository;
use \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ArticleRepository extends ServiceEntityRepository {
    function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }
}
