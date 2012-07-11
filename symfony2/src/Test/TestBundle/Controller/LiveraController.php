<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiveraController extends Controller
{
    
    public function postAction($article){
        $_locale = 'fr';
        return $this->render('TestBundle:Default:article.html.twig', array(
            'head' => array(
                'title'     =>  "Site web de Livera",
                'css'       =>  "style.css",
            ),
            
            'posts' => $this->getDoctrine()
                ->getEntityManager()
                ->createQuery("SELECT p FROM TestBundle:Post p WHERE p.title=:title")
                ->setParameter(':title', $article)
                ->getResult(),
            
            'footer' => array(
                'twitter'   =>  array(
                    'link'  =>  "https://twitter.com/NicolasSarkozy",
                    'logo'  =>  "pict-2.png"
                ),
                
                'facebook'  =>  array(
                    'link'  =>  "#",
                    'logo'  =>  'pict-3.png'
                ),
                
                'flickr'    =>  array(
                    'link'  =>  "",
                    'logo'  =>  "pict-4.png"
                ),
                
                'rss'       =>  array(
                    'link'  =>  "",
                    'logo'  =>  "pict-1.png"
                )
            ),
            
            'langs' => array(
                'fr', 'en', 'de', 'wtf'
            ),
            
            'current_lang' => $_locale, 
        ));
    }
    
    public function withoutLangAction(){
        return $this->langAction('fr');
    }
    
    public function langAction($_locale)
    {   
        return $this->render('TestBundle:Default:livera.html.twig', array(
            'head' => array(
                'title'     =>  "Site web de Livera",
                'css'       =>  "style.css",
            ),
            
            'pages' => $this->getDoctrine()->getEntityManager()->getRepository('TestBundle:Page')->findAll(),
            
            'posts' => $this->getDoctrine()
                ->getEntityManager()
                ->createQuery("SELECT p FROM TestBundle:Post p WHERE p.lang=:lang")
                ->setParameter(':lang', $_locale)
                ->getResult(),
            
            'address' => $this->getDoctrine()
                ->getEntityManager()
                ->createQuery("SELECT a FROM TestBundle:Address a WHERE a.lang=:lang")
                ->setParameter(':lang', $_locale)
                ->getResult(),
            
            'news' => $this->getDoctrine()
                ->getEntityManager()
                ->createQuery("SELECT a FROM TestBundle:News a WHERE a.lang=:lang")
                ->setParameter(':lang', $_locale)
                ->getResult(),
            
            'footer' => array(
                'twitter'   =>  array(
                    'link'  =>  "https://twitter.com/NicolasSarkozy",
                    'logo'  =>  "pict-2.png"
                ),
                
                'facebook'  =>  array(
                    'link'  =>  "#",
                    'logo'  =>  'pict-3.png'
                ),
                
                'flickr'    =>  array(
                    'link'  =>  "",
                    'logo'  =>  "pict-4.png"
                ),
                
                'rss'       =>  array(
                    'link'  =>  "",
                    'logo'  =>  "pict-1.png"
                )
            ),
            
            'langs' => array(
                'fr', 'en'
            ),
            
            'current_lang' => $_locale, 
        ));
    }
}