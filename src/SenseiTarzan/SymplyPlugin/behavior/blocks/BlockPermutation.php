<?php

/*
 *
 *  _____                       _
 * /  ___|                     | |
 * \ `--. _   _ _ __ ___  _ __ | |_   _
 *  `--. \ | | | '_ ` _ \| '_ \| | | | |
 * /\__/ / |_| | | | | | | |_) | | |_| |
 * \____/ \__, |_| |_| |_| .__/|_|\__, |
 *         __/ |         | |       __/ |
 *        |___/          |_|      |___/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Symply Team
 * @link http://www.symplymc.com/
 *
 *
 */

declare(strict_types=1);

namespace SenseiTarzan\SymplyPlugin\behavior\blocks;

use SenseiTarzan\SymplyPlugin\behavior\blocks\builder\BlockPermutationBuilder;
use SenseiTarzan\SymplyPlugin\behavior\blocks\info\BlockCreativeInfo;
use SenseiTarzan\SymplyPlugin\behavior\common\enum\CategoryCreativeEnum;
use SenseiTarzan\SymplyPlugin\behavior\common\enum\GroupCreativeEnum;

abstract class BlockPermutation extends Block implements IPermutationBlock
{
	public function getBlockBuilder() : BlockPermutationBuilder{
		return BlockPermutationBuilder::create()
			->setBlock($this)
			->setGeometry("minecraft:geometry.full_block")
			->setCreativeInfo(new BlockCreativeInfo(CategoryCreativeEnum::CONSTRUCTION, GroupCreativeEnum::NONE));
	}
}