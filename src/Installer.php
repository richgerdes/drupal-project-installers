<?php

namespace RoyGoldman\DrupalProjectInstallers;

use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;
use RoyGoldman\ComposerInstallersDiscovery\Installer as DiscoveryInstaller;

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

    $installed = parent::isInstalled($repo, $package);
    if (!$installed) {
      return $installed;
    }
    else {
      // If directory exists, check for existance of drupal's index.php.
      $installPath = $this->getInstallPath($package);
      return file_exists($installPath . '/index.php');
    }
  }

}
