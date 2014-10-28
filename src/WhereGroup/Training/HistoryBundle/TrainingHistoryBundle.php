<?php

namespace WhereGroup\Training\HistoryBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class TrainingCoreBundle
 *
 * @package WhereGroup\Training\HistoryBundle
 * @author  A.R.Pour
 */
class TrainingHistoryBundle extends Bundle
{
    /**
     * Returns the bundle parent name.
     *
     * @return string The Bundle parent name it overrides or null if no parent
     *
     * @api
     */
    public function getParent() {
        return 'TrainingCoreBundle';
    }
}
