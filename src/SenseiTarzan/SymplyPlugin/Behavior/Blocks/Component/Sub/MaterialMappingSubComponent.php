<?php

/*
 *
 *            _____ _____         _      ______          _____  _   _ _____ _   _  _____
 *      /\   |_   _|  __ \       | |    |  ____|   /\   |  __ \| \ | |_   _| \ | |/ ____|
 *     /  \    | | | |  | |______| |    | |__     /  \  | |__) |  \| | | | |  \| | |  __
 *    / /\ \   | | | |  | |______| |    |  __|   / /\ \ |  _  /| . ` | | | | . ` | | |_ |
 *   / ____ \ _| |_| |__| |      | |____| |____ / ____ \| | \ \| |\  |_| |_| |\  | |__| |
 *  /_/    \_\_____|_____/       |______|______/_/    \_\_|  \_\_| \_|_____|_| \_|\_____|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author AID-LEARNING
 * @link https://github.com/AID-LEARNING
 *
 */

declare(strict_types=1);

namespace SenseiTarzan\SymplyPlugin\Behavior\Blocks\Component\Sub;

use pocketmine\nbt\tag\CompoundTag;
use SenseiTarzan\SymplyPlugin\Behavior\Blocks\Enum\TargetMaterialEnum;
use SenseiTarzan\SymplyPlugin\Behavior\Common\Component\Sub\ISubComponent;

final readonly class MaterialMappingSubComponent implements ISubComponent
{

	public function __construct(
		protected TargetMaterialEnum $target,
		protected string             $mapping
	)
	{
	}

	public function getTarget() : TargetMaterialEnum
	{
		return $this->target;
	}

	public function getMapping() : string
	{
		return $this->mapping;
	}

	public function toNbt() : CompoundTag
	{
		return CompoundTag::create()->setString($this->target->value, $this->mapping);
	}
}
