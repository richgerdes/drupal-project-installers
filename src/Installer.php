<?php

namespace RoyGoldman\DrupalProjectInstallers;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Package\Package;
use Composer\Repository\RepositoryManager;
use RoyGoldman\ComposerInstallersDiscovery\DiscoveryInstaller;

/**
 * Implement custom installer to search dependencies for installer locations.
 */
class Installer extends DiscoveryInstaller {

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return $packageType === 'drupal-core';
    }

    /**
     * {@inheritDoc}
     */
    public function isInstalled(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        $parent == parent::isInstalled($repo, $package);
        if (!$parent) {
          return $parent;
        }
        else {
          // If directory exists, check for existance of drupal's index.php.
          $installPath = $this->getInstallPath($package);
          return file_exists($installPath . '/index.php');
        }
    }

}
