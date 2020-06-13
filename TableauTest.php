/**
Pour que cela fonctionne, il faut que tabeau.php soit une classe

final class Tableau
{

...

}

**/


<?php
use PHPUnit\Framework\TestCase;

final class TableauTest extends TestCase
{
    public function testET()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET q')
        );
    }

    public function testEspaces()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('    p   ET   q  ')
        );
    }

    public function testETOU()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET q OU w')
        );
    }

    public function testETOUNON()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET q OU NON w')
        );
    }

    public function testETOUNONParenthese()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET q OU NON(w)')
        );
    }

    public function testNONETOU()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('NON p ET q OU w')
        );
    }

    public function testParenthesesGauche()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('(p ET q) OU w')
        );
    }

    public function testParenthesesMilieu()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET (q IMPR r) OU w')
        );
    }

    public function testParenthesesDroite()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('p ET (q OU w)')
        );
    }

    public function testParenthesesCompliquees()
    {
        $this->assertEquals(
            1,
            Tableau::verifFormule('r IMP (p ET (q OU (t ET r) OU (w EQ n))) OU q')
        );
    }


    public function testEchecSimple()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('ET')
        );
    }

    public function testEchecVariables()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('p ET z')
        );
    }

    public function testEchecOperateurMinuscules()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('p et w')
        );
    }

    public function testEchecOperateurConnaitPas1()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('p ETE w')
        );
    }

    public function testEchecOperateurConnaitPas2()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('p E w')
        );
    }

    public function testEchecOperateurConnaitPas3()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('p IM w')
        );
    }

    public function testEchecParenthesesCompliquees()
    {
        $this->assertNotEquals(
            1,
            Tableau::verifFormule('r IMP ((p ET (q OU (t ET r) OU (w EQ n))) OU q')
        );
    }
}


/**
RESULTATS

There were 9 failures:

1) TableauTest::testEspaces
Failed asserting that 'erreur le dernier doit etre un opérateur' matches expected 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:18

2) TableauTest::testNONETOU
Failed asserting that 'erreur le dernier doit etre un opérateur' matches expected 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:50

3) TableauTest::testParenthesesGauche
Failed asserting that 'il y a une erreur dans les parentheses ' matches expected 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:58

4) TableauTest::testEchecVariables
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:99

5) TableauTest::testEchecOperateurMinuscules
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:107

6) TableauTest::testEchecOperateurConnaitPas1
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:115

7) TableauTest::testEchecOperateurConnaitPas2
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:123

8) TableauTest::testEchecOperateurConnaitPas3
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:131

9) TableauTest::testEchecParenthesesCompliquees
Failed asserting that 1 is not equal to 1.

/home/laroche5/Desktop/table-de-verite/tests/TableauTest.php:139

FAILURES!
Tests: 17, Assertions: 17, Failures: 9.


**/
