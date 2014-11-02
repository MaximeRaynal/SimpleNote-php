<?php

namespace SimpleNote\NoteBundle\Entity;

/**
* Une page est la composante d'une note,
* Elle PEUT être repèré par un nom
* SINON par son numéro (ordre)
* Elle contient du texte rédigé au format Markdown
* Cette élément n'est pas stocké en base de données mais local
*/
class Page implements \JsonSerializable{

    private $order;

    private $note;

    private $name;

    /**
     * Texte au format Markdown
     */
    private $text;

    public function __construct() {

    }

    /**
     * Gère l'accès aux propriétés privés
     * (remplace une longue list de Getters / Setters)
     *
     * Fonction géré :
     * - get('prop') : Retourne la valeur de l'attribut
     * - get('prop1', 'prop2', 'prop3') : (voir suivant)
     * - get(array('prop1', 'prop2', 'prop3')) : Retourne un tableau
     * associatif contenant les valeurs des attributs
     * - getProp() : Retourne la valeur de l'attribut prop
     * - set('prop', valeur) : Affecte valeur à prop
     * - setProp(valeur) : Affecte valeur à prop
     * - set(array('prop1' => valeur, 'prop2' => valeur))
     * @return Si c'est un getter : la/les propriétés demandé
     * Si c'est un setter : $this
     */
    public function __call($name, $arguments) {
        $reflex = new \ReflectionClass($this); //Unité de réflèxion
        $action = '';
        $requieredProperties = array();
        if ($name == 'get' || $name == 'set') { //Phase de détermination
            $action = $name;
            if (count($arguments) == 2 && $action == 'set') {
                $requieredProperties = array($arguments[0] => $arguments[1]);
            }elseif (count($arguments) == 1 && is_array($arguments[0])) {
                $requieredProperties = $arguments[0];
            } else {
                $requieredProperties = $arguments;
            }
        } elseif (strlen($name) > 3 && preg_match('/^(get|set)/', $name)) {
            $action = substr($name, 0, 3);
            if ($action == 'get') {
                $requieredProperties[] = lcfirst(substr($name, 3));
            } elseif ($action == 'set') {
                $requieredProperties =
                array(lcfirst(substr($name, 3)) => $arguments[0]);
            }
        } else { //Pas matché un getter ou setter
            throw new Exception("Method : " . $name . ' unknow.', 1);
        }
        $result = array(); //Phase d'action
        foreach ($requieredProperties as $aK => $aV) {
            if ($reflex->hasProperty($aK) || $reflex->hasProperty($aV)) {
                if ($action == 'get') {
                    $property = $reflex->getProperty($aV);
                    $property->setAccessible(true);
                    $result[$aV] = $property->getValue($this);
                } elseif ($action == 'set') {
                    $property = $reflex->getProperty($aK);
                    $property->setAccessible(true);
                    $property->setValue($this, $aV);
                }
            } else {
                throw new Exception('Property : '.$aK.'=>'.$aV.' unknow !', 42);
            }
        }
        return count($result) == 0 ? $this :
            (count($result) == 1 ? $result[$requieredProperties[0]] : $result);
    }

    /**
     * Retourne tout sauf les tags (lazyLoading, convertit les dates en timestamp
     */
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        //Pour éviter une récursion dans la sérialisation
        unset($vars['note']);

        return $vars;
    }

}