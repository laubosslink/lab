<?php

class tryit
{
        public function display()
        {
                throw new Exception("Message Error ", 1520);
        }
}

class tryit2
{
        public function display()
        {
                $try = new tryit();

                try {
                        $try->display();
                } catch(Exception $e)
                {
                        throw $e;
                }
        }
}

$try = new tryit();

try
{
        $try->display();
} catch(Exception $e)
{
        echo $e->getMessage();
        echo $e->getCode();

        echo "<br /><br />";
        echo $e;
}

$try = new tryit2();

try
{
        $try->display();
} catch(Exception $e)
{
        echo "<br /><br />tryit2: <br />";
        echo $e->getMessage();
        echo $e->getCode();
        echo "<br /><br />";
//        echo $e;
}
