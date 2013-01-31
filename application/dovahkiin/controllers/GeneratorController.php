<?php

namespace application\dovahkiin\controllers;

/**
 * Next Abstract Controller Class
 */
use Next\Controller\AbstractController;

/**
 * Next Controller Exception (Standardization Concept)
 */
use Next\Controller\ControllerException;

use application\dovahkiin\models\Alphabet;

/**
 * Generator Controller for Dovahkiin Application
 */
class GeneratorController extends AbstractController {

    /**
     *  Additional Initialization
     */
    protected function init() {

        // One single template for both, View and Action

        $this -> view -> setDefaultTemplate( 'generator/index.phtml' );

        $alphabet = Alphabet::getAlphabet();

        // Dropdowns Data

        $this -> dragonWords = array_map(

            function( $current ) {

                return $current[ 0 ];
            },

            $alphabet
        );

        $this -> humanWords = array_map(

            function( $current ) {

                return $current[ 1 ];
            },

            $alphabet
        );
    }

    /**
     * Generator View
     *
     * !Route    GET,    /finished/generator
     */
    final public function main() {}

    /**
     * Translator
     *
     * !Route    POST,    /finished/generator
     */
    final public function translateAction() {

        $words = $this -> getRequest() -> getPost();

        $result = array();

        foreach( $words as $word ) {

            try {

                list( $word, $meaning, $tip, $reference ) =
                    array_merge( Alphabet::getWord( $word ), array( NULL, NULL ) );


                $result[ $words['translate'] ]['words'][] = $word;
                $result[ $words['translate'] ]['meanings'][] = $meaning;
                $result[ $words['translate'] ]['tips'][] = $tip;
                $result[ $words['translate'] ]['references'][] = $reference;

            } catch( \Next\Exception $e ) {

                /**
                 *  We don't need to rethrow this Exception because it
                 *  refers to unknown words
                 */
            }
        }

        $this -> result = $result;
    }
}
