<?php 

class Utilities 
{
    public function getSectionsTheme(){
        $em = $this->getDoctrine()->getManager();
        $repositoryParameters = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefParameters");
        $repositoryThemes = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefThemes");
        $repositorySectionsTheme = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefSectionsTheme");
        $repositoryModules = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefModules");

        $id_theme = $repositoryParameters->find(7)->getValue();
        $theme = $repositoryThemes->find($id_theme);
        $sectionsTheme = $repositorySectionsTheme->findByIdTheme($theme->getId());
        foreach ($sectionsTheme as $sectionTheme) {
            $sectionTheme->modulos = $repositoryModules->findByIdSectionTheme($sectionTheme->getIdSectionTheme());
        }
        dump($sectionsTheme);

        return $sectionsTheme;
    }
    public function getMenu(){
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:CmsStzefMenus");

        $cmsStzefMenuses = $repository->findByIfMain("1");

        foreach ($cmsStzefMenuses as $cmsStzefMenu) {
            $subMenus = $repository->findByTopMenu($cmsStzefMenu->getid());
            $cmsStzefMenu->subMenus = $subMenus;
            foreach ($subMenus as $subMenu) {
                $subMenus = $repository->findByTopMenu($subMenu->getid());
                $subMenu->subMenus = $subMenus;
            }
        }
        return $cmsStzefMenuses;
    }

    public function clean_string($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}
