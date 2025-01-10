# TutoSymfony
Cours de symfony avec quelque explications

## Pour creer une entity 
*php bin/console make:entity 'entity_name'*
dire par la suite *non*
Et ensuite on enumere les properties avec les datas types

## Apres tous il faudrais taper la commande pour pouvoir creer les fichiers:
*php bin/console make:migration*

## Pour la mise a jour de notre migration : 
il faut taper la commande : 
*php bin/console doctrine:migrations:migrate*


## Pour modifier une entity il faut taper la commande : 
*php bin/console make:entiry 'entity_name'*

Et apres avoir creer un nouveau champ ou colonnes il faut donc taper la commande :
*php bin/console make:migration*

Et en suite migrer : *php bin/console doctrine:migrations:migrate*

### Faire une recherche sur les query builder de symfony

<!-- Pour la modification, l'ajout la suppressio d'une donnees dans la table il faut utiliser le entity manager interface dans le controlleur de l'entite et a la fin de chaque methode a savoir  -->

*Pour l'ajout il faut donc faire de la sorte :*
 <!-- Creation d'une nouvelle donnees (recipe)
 $recipe = new Recipe();
 $recipe->setTitle('Barbe à papa')
 ->setSlug('barbe-a-papa')
 ->setContent('Mettez du sucre')
 ->setDuration(15)
 ->setCreatedAt(new \DateTimeImmutable())
 ->setUpdatedAt(new \DateTimeImmutable());
 $em->persist($recipe);
 $em->flush(); -->

*Pour la modificaiton il faut donc appeler la methode "flush()" pour que les m-a-j soient garder dans la database*
<!-- $recipes[0]->setTitle("Mousse au Chocolat");
$em->flush(); -->

*Si l'on souhaite maintenant supprimer une donnees dans la base des donnees il faut :*
<!-- $em->remove($recipes[0]);
$em->flush(); -->

