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

namespace SenseiTarzan\SymplyPlugin\Behavior\Blocks\Component;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use SenseiTarzan\SymplyPlugin\Behavior\Common\Component\IComponent;
use function array_map;
use function array_merge;
use function is_array;

class CraftingTableComponent implements IComponent
{

	public function __construct(
		private array $craftingTags,
		private int $gridSize,
		private string $tableName
	)
	{
	}

	public static function create(int $gridSize, string $tableName) : CraftingTableComponent
	{
		return new self([], $gridSize, $tableName);
	}

	/**
	 * @return $this
	 */
	public function addTags(string|array $tags) : self
	{
		$this->craftingTags = array_merge($this->craftingTags, is_array($tags) ? $tags : [$tags]);
		return $this;
	}

	public function getName() : string
	{
		return "minecraft:crafting_table";
	}

	public function toNbt() : CompoundTag
	{
		return CompoundTag::create()->setTag($this->getName(), CompoundTag::create()
			->setTag("crafting_tags", new ListTag(array_map(fn(string $tag) => new StringTag($tag), $this->craftingTags)))
		->setInt("grid_size", $this->gridSize)
		->setString("table_name", $this->tableName));
	}
}