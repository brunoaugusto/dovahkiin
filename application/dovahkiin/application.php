<?php

namespace application\dovahkiin;

/**
 * Required Classes / Interfaces
 */
use Next\Application\AbstractApplication,    # Abstract Application Class
    Next\View;                               # View Class

/**
 * Dovahkiin Application Class
 *
 * @author      Bruno Augusto
 *
 * @copyright   Copyright (c) 2013 Next Studios
 * @license     http://creativecommons.org/licenses/by-nd/3.0/   Attribution-NoDerivs 3.0 Unported
 *
 * @package     application
 * @subpackage  dovahkiin
 */
class application extends AbstractApplication {

    /**
     * Setup Application Controllers
     */
    protected function setupControllers()  {

        $this -> controllers -> add( new Controllers\GeneratorController );
    }

    /**
     * Setup View Engine
     */
    protected function setupView() {

        $this -> view = new View( $this );

        $this -> view -> setBasepath( sprintf( '%s/Views', dirname( __FILE__ ) ) );
    }
}
