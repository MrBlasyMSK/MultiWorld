<?php

/**
 * MultiWorld - PocketMine plugin that manages worlds.
 * Copyright (C) 2018 - 2022  CzechPMDevs
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace czechpmdevs\multiworld\generator\normal\biome;

use czechpmdevs\multiworld\generator\normal\biome\types\GrassyBiome;
use czechpmdevs\multiworld\generator\normal\populator\impl\plant\Plant;
use czechpmdevs\multiworld\generator\normal\populator\impl\PlantPopulator;
use czechpmdevs\multiworld\generator\normal\populator\impl\TallGrassPopulator;
use czechpmdevs\multiworld\generator\normal\populator\impl\TreePopulator;
use pocketmine\block\utils\TreeType;
use pocketmine\block\VanillaBlocks;

class BirchForest extends GrassyBiome {

	public function __construct() {
		parent::__construct(0.6, 0.6);

		$mushrooms = new PlantPopulator(2, 2, 95);
		$mushrooms->addPlant(new Plant(VanillaBlocks::RED_MUSHROOM()));
		$mushrooms->addPlant(new Plant(VanillaBlocks::BROWN_MUSHROOM()));

		$flowers = new PlantPopulator(6, 7, 80);
		$flowers->addPlant(new Plant(VanillaBlocks::DANDELION()));
		$flowers->addPlant(new Plant(VanillaBlocks::POPPY()));

		$roses = new PlantPopulator(5, 4, 80);
		$roses->addPlant(new Plant(VanillaBlocks::LILAC()));

		$peonys = new PlantPopulator(5, 4, 80);
		$peonys->addPlant(new Plant(VanillaBlocks::PEONY()));

		$birch = new TreePopulator(5, 4, 100, TreeType::BIRCH());
		$grass = new TallGrassPopulator(56, 20);

		$this->addPopulators([$birch, $flowers, $peonys, $roses, $mushrooms, $grass]);

		$this->setElevation(63, 70);
	}

	public function getName(): string {
		return "Birch Forest";
	}
}