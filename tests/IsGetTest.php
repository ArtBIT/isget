<?php
class IsGetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     */
    public function test_generic($input, $existing_keys, $missing_keys, $default = null) {

        foreach ($existing_keys as $key) {
            $this->assertEquals($input[$key], isget($input[$key], $default), "[Array['{$key}'] and isget(Array['{$key}']) should be equal");
        }

        // default value for missing values is FALSE
        foreach ($missing_keys as $key) {
            $this->assertFalse(isget($input[$key]), "isget(Array['{$key}']) should return false");
        }

        if (func_num_args() == 4) {
            foreach ($missing_keys as $key) {
                $this->assertEquals($default, isget($input[$key], $default), "isget(Array['{$key}']) should return the provided default value");
            }
        }

    }

    public function provider() {
        return array(
            array(
                'input' => array(
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ),
                'existing_keys' => array(
                    'a', 'b', 'c'
                ),
                'missing_keys' => array(
                    'x', 'y', 'z'
                )
            ),
            array(
                'input' => array(
                    'name' => 'Jim',
                    'surname' => 'Carey',
                ),
                'existing_keys' => array(
                    'name', 'surname'
                ),
                'missing_keys' => array(
                    'username'
                ),
                'default' => 'unknown',
            ),
        );
    }

}

